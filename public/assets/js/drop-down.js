function openDropdown(event, dropdownID) {
  let element = event.target;
  while (element.nodeName !== "A") {
    element = element.parentNode;
  }
  Popper.createPopper(element, document.getElementById(dropdownID), {
    placement: "bottom-start",
  });
  document.getElementById(dropdownID).classList.toggle("hidden");
  document.getElementById(dropdownID).classList.toggle("block");
}