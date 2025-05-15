function myFunction() {
  console.log(1);
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName("li");

  if (ul.classList.contains("d-none")) {
    ul.classList.remove("d-none");
    ul.classList.add("d-block");
  }

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].classList.add("show-menu-drop");

      li[i].style.display = "";
    } else {
      li[i].classList.remove("show-menu-drop");
    }
  }
  document.addEventListener("click", function (event) {
    const input = document.getElementById("myInput");
    const ul = document.getElementById("myUL");
    if (!input.contains(event.target) && !ul.contains(event.target)) {
      ul.classList.remove("d-block");
      ul.classList.add("d-none");

      console.log(ul);
    }
  });
}