async function register() {
  const nameValue = document.getElementById("name").value.trim();
  const emailValue = document.getElementById("email").value.trim();
  const passwordValue = document.getElementById("password").value.trim();
  console.log("REGISTER DATA:", nameValue, emailValue, passwordValue);
  const res = await fetch(API_BASE + "/register", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      name: nameValue,
      email: emailValue,
      password: passwordValue
    })
  });
  showMessage("msg", (await res.json()).message);
}

async function login() {
  const res = await fetch(API_BASE + "/login", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({
      email: email.value,
      password: password.value
    })
  });

  const data = await res.json();
  if (data.token) {
    localStorage.setItem("token", data.token);
    location.href = "dashboard.html";
  } else showMessage("msg", data.error);
}
