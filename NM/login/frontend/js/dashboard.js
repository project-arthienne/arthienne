const token = localStorage.getItem("token");
if (!token) location.href = "login.html";

async function updateProfile() {
  const res = await fetch(API_BASE + "/profile", {
    method: "PUT",
    headers: {
      "Content-Type": "application/json",
      "Authorization": token
    },
    body: JSON.stringify({ name: document.getElementById("name").value })
  });
  showMessage("msg", (await res.json()).message);
}

function logout() {
  localStorage.removeItem("token");
  location.href = "login.html";
}
