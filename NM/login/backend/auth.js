const express = require("express");
const bcrypt = require("bcryptjs");
const jwt = require("jsonwebtoken");
const crypto = require("crypto");
const pool = require("./db");
const auth = require("./authMiddleware");
require("dotenv").config();

const router = express.Router();

/* REGISTER */
router.post("/register", async (req, res) => {
  const { name, email, password } = req.body;
  const hash = await bcrypt.hash(password, 10);

  try {
    await pool.query(
      "INSERT INTO users (name,email,password) VALUES ($1,$2,$3)",
      [name, email, hash]
    );
    res.json({ message: "Registered successfully" });
  } catch {
    res.status(400).json({ error: "Email already exists" });
  }
});

/* LOGIN */
router.post("/login", async (req, res) => {
  const { email, password } = req.body;
  const result = await pool.query(
    "SELECT * FROM users WHERE email=$1",
    [email]
  );

  if (!result.rows.length ||
      !(await bcrypt.compare(password, result.rows[0].password)))
    return res.status(400).json({ error: "Invalid credentials" });

  const token = jwt.sign(
    { id: result.rows[0].id },
    process.env.JWT_SECRET,
    { expiresIn: "1h" }
  );

  res.json({ token });
});

/* UPDATE PROFILE */
router.put("/profile", auth, async (req, res) => {
  console.log("USER ID:", req.user.id);
  console.log("NEW NAME:", req.body.name);

  const result = await pool.query(
    "UPDATE users SET name=$1 WHERE id=$2",
    [req.body.name, req.user.id]
  );

  console.log("ROWS UPDATED:", result.rowCount);

  res.json({ message: "Profile updated" });
});

/* FORGOT PASSWORD */
router.post("/forgot-password", async (req, res) => {
  const token = crypto.randomBytes(32).toString("hex");

  const result = await pool.query(
    `UPDATE users
     SET reset_token=$1, reset_token_expiry=NOW()+INTERVAL '1 hour'
     WHERE email=$2 RETURNING id`,
    [token, req.body.email]
  );

  if (!result.rows.length)
    return res.status(404).json({ error: "User not found" });

  res.json({ token });
});

/* RESET PASSWORD */
router.post("/reset-password/:token", async (req, res) => {
  const hash = await bcrypt.hash(req.body.password, 10);

  const result = await pool.query(
    `UPDATE users
     SET password=$1, reset_token=NULL, reset_token_expiry=NULL
     WHERE reset_token=$2 AND reset_token_expiry > NOW()`,
    [hash, req.params.token]
  );

  if (!result.rowCount)
    return res.status(400).json({ error: "Invalid or expired token" });

  res.json({ message: "Password reset successful" });
});

module.exports = router;
