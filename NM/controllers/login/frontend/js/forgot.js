async function forgotPassword() {
  const res = await fetch(API_BASE + "/forgot-password", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ email: email.value })
  });
  const data = await res.json();
  showMessage("msg", data.token || data.error);
}

async function resetPassword() {
  const res = await fetch(
    API_BASE + "/reset-password/" + token.value,
    {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ password: password.value })
    }
  );
  showMessage("msg", (await res.json()).message);
}
