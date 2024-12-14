// Set open tab function
function setOpenTab(el, tab) {
  // Toggle Buttons
  let prevElem = el.previousElementSibling;
  let nextElem = el.nextElementSibling;
  if (prevElem) {
    prevElem.classList.remove('bg-white', 'text-blueGray-600', 'border-blueGray-400');
    prevElem.classList.add('border-transparent', 'text-blueGray-500');
    prevElem.firstElementChild.classList.remove('text-lightBlue-600');
  } else {
    nextElem.classList.remove('bg-white', 'text-blueGray-600', 'border-blueGray-400');
    nextElem.classList.add('border-transparent', 'text-blueGray-500');
    nextElem.firstElementChild.classList.remove('text-lightBlue-600');
  }
  el.classList.remove('border-transparent');
  el.classList.add('bg-white', 'text-blueGray-600', 'border-blueGray-400');
  el.firstElementChild.classList.add('text-lightBlue-600');
  // Toggle Tabs
  var tabs = el.closest('.flex').nextElementSibling.querySelector('.ct-docs-frame').children;
  if (tab == 'preview') {
    if (tabs[0].classList.contains('hidden')) {
      tabs[0].classList.remove('hidden');
    }
    tabs[1].classList.add('hidden');
  }
  if (tab == 'code') {
    tabs[0].classList.add('hidden');
    if (tabs[1].classList.contains('hidden')) {
      tabs[1].classList.remove('hidden');
    }
  }
}

// Copy code function
function copyCode(el) {
  var tabs = el.closest('.flex').nextElementSibling.querySelector('.ct-docs-frame').children;
  tabs[0].classList.add('hidden');
  tabs[1].classList.remove('hidden');

  var buttons = el.parentElement.previousElementSibling;
  var firstButton = buttons.children[0];
  var secondButton = buttons.children[1];

  firstButton.classList.remove('bg-white', 'text-blueGray-600', 'border-blueGray-400');
  firstButton.classList.add('border-transparent', 'text-blueGray-500');
  firstButton.firstElementChild.classList.remove('text-lightBlue-600');

  secondButton.classList.remove('border-transparent');
  secondButton.classList.add('bg-white', 'text-blueGray-600', 'border-blueGray-400');
  secondButton.firstElementChild.classList.add('text-lightBlue-600');

  const selection = window.getSelection();
  const range = document.createRange();
  const textToCopy = tabs[1];
  range.selectNodeContents(textToCopy);
  selection.removeAllRanges();
  selection.addRange(range);
  const successful = document.execCommand('copy');
  window.getSelection().removeAllRanges();
  if (!el.parentElement.querySelector('.alert')) {
    var alert = document.createElement('div');
    alert.classList.add('alert', 'px-4', 'py-2', 'border-0', 'rounded', 'mb-4', 'top-0', 'mt-4', 'right-0', 'mr-10', 'text-white', 'bg-emerald-500', 'absolute');
    alert.style.transform = 'translate3d(0px, 0px, 0px)'
    alert.style.opacity = '0';
    alert.style.transition = '.35s ease';
    setTimeout(function() {
      alert.style.transform = 'translate3d(0px, 20px, 0px)';
      alert.style.setProperty("opacity", "1", "important");
    }, 100);
    alert.innerHTML = "Code successfully copied!";
    tabs[1].parentElement.appendChild(alert);
    setTimeout(function() {
      alert.style.transform = 'translate3d(0px, 0px, 0px)'
      alert.style.setProperty("opacity", "0", "important");
    }, 2000);
    setTimeout(function() {
      tabs[1].parentElement.querySelector('.alert').remove();
    }, 2500);
  }
}

// Accordion function
function openAccordion(el) {
  var accordionContent = el.parentElement.nextElementSibling;
  var accordionArrow = el.querySelector('.fa-chevron-down');

  accordionContent.classList.toggle('hidden');
  accordionArrow.classList.toggle('rotate-180');

  var accordionContentHeight = accordionContent.firstElementChild.offsetHeight + 'px';
  accordionContent.style.height = accordionContentHeight;
}

// Change color function
function changeColor(el) {
  var colors = ['blueGray', 'red', 'orange', 'amber', 'emerald', 'teal', 'lightBlue', 'indigo', 'purple', 'pink', 'facebook', 'twitter', 'instagram', 'github', 'pinterest', 'youtube', 'vimeo', 'slack', 'dribbble', 'reddit', 'tumblr', 'linkedin'];

  // Remove active from all badges
  var colorBadges = el.parentElement.querySelectorAll('.cursor-pointer.w-6.h-6');
  for (var i = 0; i < colorBadges.length; i++) {
    colorBadges[i].classList.add('bg-opacity-25');
    colorBadges[i].classList.remove('shadow-md');
  }

  // Add active to current badge
  el.classList.remove('bg-opacity-25');
  el.classList.add('shadow-md');

  var colorEl = el.getAttribute('data-color');

  // Get closest element with the badge color
  var elementSection = el.parentElement.parentElement.nextElementSibling;

  for (var j = 0; j < colors.length; j++) {
    if (elementSection.querySelector('[class*=' + colors[j] + ']')) {
      var elements = elementSection.querySelectorAll('[class*=' + colors[j] + ']');
    }
  }

  // Change color of element
  elements.forEach(element => {
    var elementClasses = element.classList;
    var classesToRemove = [];
    elementClasses.forEach(className => {
      for (var k = 0; k < colors.length; k++) {
        if (className.includes(colors[k]) && !className.includes(colorEl)) {
          let newColor = className.replace(colors[k], colorEl);
          element.classList.add(newColor);
          classesToRemove.push(className);
        }
      }
    });

    // Remove old color classest from element
    for (var n = 0; n < classesToRemove.length; n++) {
      element.classList.remove(classesToRemove[n]);
    }
  });
}

// Function for opning navbar on mobile
function toggleNavbar(collapseID) {
  document.getElementById(collapseID).classList.toggle("hidden");
  document.getElementById(collapseID).classList.toggle("block");
}

/* Chart initialisations */
/* Line Chart */
var config = {
  type: "line",
  data: {
    labels: [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
    ],
    datasets: [{
        label: new Date().getFullYear(),
        backgroundColor: "#4c51bf",
        borderColor: "#4c51bf",
        data: [65, 78, 66, 44, 56, 67, 75],
        fill: false,
      },
      {
        label: new Date().getFullYear() - 1,
        fill: false,
        backgroundColor: "#fff",
        borderColor: "#fff",
        data: [40, 68, 86, 74, 56, 60, 87],
      },
    ],
  },
  options: {
    maintainAspectRatio: false,
    responsive: true,
    title: {
      display: false,
      text: "Sales Charts",
      fontColor: "white",
    },
    legend: {
      labels: {
        fontColor: "white",
      },
      align: "end",
      position: "bottom",
    },
    tooltips: {
      mode: "index",
      intersect: false,
    },
    hover: {
      mode: "nearest",
      intersect: true,
    },
    scales: {
      xAxes: [{
        ticks: {
          fontColor: "rgba(255,255,255,.7)",
        },
        display: true,
        scaleLabel: {
          display: false,
          labelString: "Month",
          fontColor: "white",
        },
        gridLines: {
          display: false,
          borderDash: [2],
          borderDashOffset: [2],
          color: "rgba(33, 37, 41, 0.3)",
          zeroLineColor: "rgba(0, 0, 0, 0)",
          zeroLineBorderDash: [2],
          zeroLineBorderDashOffset: [2],
        },
      }, ],
      yAxes: [{
        ticks: {
          fontColor: "rgba(255,255,255,.7)",
        },
        display: true,
        scaleLabel: {
          display: false,
          labelString: "Value",
          fontColor: "white",
        },
        gridLines: {
          borderDash: [3],
          borderDashOffset: [3],
          drawBorder: false,
          color: "rgba(255, 255, 255, 0.15)",
          zeroLineColor: "rgba(33, 37, 41, 0)",
          zeroLineBorderDash: [2],
          zeroLineBorderDashOffset: [2],
        },
      }, ],
    },
  },
};

if (document.getElementById("line-chart")) {
  var ctx = document.getElementById("line-chart").getContext("2d");
  window.myLine = new Chart(ctx, config);
}

/* Bar Chart */
config = {
  type: "bar",
  data: {
    labels: [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
    ],
    datasets: [{
        label: new Date().getFullYear(),
        backgroundColor: "#ed64a6",
        borderColor: "#ed64a6",
        data: [30, 78, 56, 34, 100, 45, 13],
        fill: false,
        barThickness: 8,
      },
      {
        label: new Date().getFullYear() - 1,
        fill: false,
        backgroundColor: "#4c51bf",
        borderColor: "#4c51bf",
        data: [27, 68, 86, 74, 10, 4, 87],
        barThickness: 8,
      },
    ],
  },
  options: {
    maintainAspectRatio: false,
    responsive: true,
    title: {
      display: false,
      text: "Orders Chart",
    },
    tooltips: {
      mode: "index",
      intersect: false,
    },
    hover: {
      mode: "nearest",
      intersect: true,
    },
    legend: {
      labels: {
        fontColor: "rgba(0,0,0,.4)",
      },
      align: "end",
      position: "bottom",
    },
    scales: {
      xAxes: [{
        display: false,
        scaleLabel: {
          display: true,
          labelString: "Month",
        },
        gridLines: {
          borderDash: [2],
          borderDashOffset: [2],
          color: "rgba(33, 37, 41, 0.3)",
          zeroLineColor: "rgba(33, 37, 41, 0.3)",
          zeroLineBorderDash: [2],
          zeroLineBorderDashOffset: [2],
        },
      }, ],
      yAxes: [{
        display: true,
        scaleLabel: {
          display: false,
          labelString: "Value",
        },
        gridLines: {
          borderDash: [2],
          drawBorder: false,
          borderDashOffset: [2],
          color: "rgba(33, 37, 41, 0.2)",
          zeroLineColor: "rgba(33, 37, 41, 0.15)",
          zeroLineBorderDash: [2],
          zeroLineBorderDashOffset: [2],
        },
      }, ],
    },
  },
};
if (document.getElementById("bar-chart")) {
  ctx = document.getElementById("bar-chart").getContext("2d");
  window.myBar = new Chart(ctx, config);
}

// Declare additional colors

const colors = {
  blueGray: "bg-blueGray-400, bg-blueGray-800",
  light: "bg-blueGray-200",
  red: "bg-red-400, bg-red-800, bg-red-900",
  orange: "bg-orange-400, bg-orange-800, bg-orange-900",
  amber: "bg-amber-400, bg-amber-800, bg-amber-900",
  emerald: "bg-emerald-400, bg-emerald-800, bg-emerald-900",
  teal: "bg-teal-400, bg-teal-800, bg-teal-900",
  lightBlue: "bg-lightBlue-400, bg-lightBlue-800, bg-lightBlue-900",
  indigo: "bg-indigo-400, bg-indigo-800, bg-indigo-900",
  purple: "bg-purple-400, bg-purple-800, bg-purple-900",
  pink: "bg-pink-400, bg-pink-800, bg-pink-900",
  amber: "text-amber-500",
  "blueGray-gradient": "bg-gradient-to-b from-blueGray-400 to-blueGray-600 bg-blueGray-400 bg-gradient-to-r from-blueGray-800 to-blueGray-900",
  "red-gradient": "bg-gradient-to-b from-red-400 to-red-600 bg-red-400 bg-gradient-to-r from-red-800 to-red-900",
  "orange-gradient": "bg-gradient-to-b from-orange-400 to-orange-600 bg-orange-400 bg-gradient-to-r from-orange-800 to-orange-900",
  "amber-gradient": "bg-gradient-to-b from-amber-400 to-amber-600 bg-amber-400 bg-gradient-to-r from-amber-800 to-amber-900",
  "emerald-gradient": "bg-gradient-to-b from-emerald-400 to-emerald-600 bg-emerald-400 bg-gradient-to-r from-emerald-800 to-emerald-900",
  "teal-gradient": "bg-gradient-to-b from-teal-400 to-teal-600 bg-teal-400 bg-gradient-to-r from-teal-800 to-teal-900",
  "lightBlue-gradient": "bg-gradient-to-b from-lightBlue-400 to-lightBlue-600 bg-lightBlue-400 bg-gradient-to-r from-lightBlue-800 to-lightBlue-900",
  "indigo-gradient": "bg-gradient-to-b from-indigo-400 to-indigo-600 bg-indigo-400 bg-gradient-to-r from-indigo-800 to-indigo-900",
  "purple-gradient": "bg-gradient-to-b from-purple-400 to-purple-600 bg-purple-400 bg-gradient-to-r from-purple-800 to-purple-900",
  "pink-gradient": "bg-gradient-to-b from-pink-400 to-pink-600 bg-pink-400 bg-gradient-to-r from-pink-800 to-pink-900",
}