document.getElementById("employee-form").addEventListener("submit", function(event) {
    var error = document.getElementById("error");
    var name = document.getElementById("name").value;
    var email = document.getElementById("mail").value;
    var password = document.getElementById("password").value;
    var role = document.getElementById("role").value;
    var job = document.getElementById("job").value;

// Mencegah kekosongan form
if (name === "" || email === "" || password === "" || role === "" || job === "") {
    event.preventDefault(); 
    error.textContent = "Please fill this field";
    error.style.color = "red";

} else {
    error.textContent = ""; 
}
});
