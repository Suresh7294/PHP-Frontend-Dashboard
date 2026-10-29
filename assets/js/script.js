console.log("SCRIPT.JS LOADED");
document.addEventListener("DOMContentLoaded", () => {

const totalOrders = document.getElementById("totalOrders");
const totalRevenue = document.getElementById("totalRevenue");
const activeRiders = document.getElementById("activeRiders");

// Sidebar Toggle
const menuToggle = document.getElementById("menuToggle");
const MenuToggleMobile = document.getElementById("MenuToggleMobile");
const sidebar = document.getElementById("sidebar");
// Desktop Menu
// Toggle sidebar on button click
if (menuToggle) {
  menuToggle.addEventListener("click", function (e) {
    e.stopPropagation();
    sidebar.classList.toggle("collapsed");
  });
}

// Mobile Menu
// Toggle sidebar on button click
if (MenuToggleMobile) {
  MenuToggleMobile.addEventListener("click", function (e) {
    e.stopPropagation(); // prevent document click
    sidebar.classList.toggle("mobile-open");
  });
}

// Hide sidebar on outside click
if (sidebar && MenuToggleMobile) {
  document.addEventListener("click", function (e) {
    if (
      sidebar.classList.contains("mobile-open") &&
      !sidebar.contains(e.target) &&
      !MenuToggleMobile.contains(e.target)
    ) {
      sidebar.classList.remove("mobile-open");
    }
  });
}

// Revenue Chart
const revenueChartElement = document.getElementById("revenueChart");
if (revenueChartElement) {
  const revenueCtx = revenueChartElement.getContext("2d");
  let revenueChart = new Chart(revenueCtx, {
    type: "line",
    data: {
      labels: ["6 AM", "9 AM", "12 PM", "3 PM", "6 PM", "9 PM", "12 AM"],
      datasets: [
        {
          label: "Revenue",
          data: [1200, 2800, 5400, 4200, 6800, 5600, 3400],
          borderColor: "#FF6B35",
          backgroundColor: "rgba(255, 107, 53, 0.1)",
          borderWidth: 3,
          fill: true,
          tension: 0.4,
          pointRadius: 5,
          pointHoverRadius: 7,
          pointBackgroundColor: "#FF6B35",
          pointBorderColor: "#fff",
          pointBorderWidth: 2,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      plugins: {
        legend: {
          display: false,
        },
        tooltip: {
          backgroundColor: "#242837",
          titleColor: "#fff",
          bodyColor: "#a0a4b8",
          borderColor: "#3a3d52",
          borderWidth: 1,
          padding: 12,
          displayColors: false,
          callbacks: {
            label: function (context) {
              return "$" + context.parsed.y.toLocaleString();
            },
          },
        },
      },
      scales: {
        y: {
          beginAtZero: true,
          grid: {
            color: "#3a3d52",
            drawBorder: false,
          },
          ticks: {
            color: "#a0a4b8",
            callback: function (value) {
              return "$" + value / 1000 + "k";
            },
          },
        },
        x: {
          grid: {
            display: false,
          },
          ticks: {
            color: "#a0a4b8",
          },
        },
      },
    },
  });
}

// Order Status Chart
const orderStatusChartElement = document.getElementById("orderStatusChart");

if (orderStatusChartElement) {
  const statusCtx = orderStatusChartElement.getContext("2d");
  const orderStatusChart = new Chart(statusCtx, {
    type: "doughnut",
    data: {
      labels: ["Delivered", "Delivering", "Preparing", "Pending"],
      datasets: [
        {
          data: [45, 25, 20, 10],
          backgroundColor: ["#2ECC71", "#3498DB", "#9B59B6", "#F39C12"],
          borderWidth: 0,
          hoverOffset: 10,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      plugins: {
        legend: {
          position: "bottom",
          labels: {
            color: "#a0a4b8",
            padding: 16,
            font: {
              size: 13,
            },
            usePointStyle: true,
            pointStyle: "circle",
          },
        },
        tooltip: {
          backgroundColor: "#242837",
          titleColor: "#fff",
          bodyColor: "#a0a4b8",
          borderColor: "#3a3d52",
          borderWidth: 1,
          padding: 12,
          callbacks: {
            label: function (context) {
              return context.label + ": " + context.parsed + "%";
            },
          },
        },
      },
    },
  });
}

// Real-time Updates Simulation
function animateValue(id, start, end, duration) {
  const element = document.getElementById(id);
  const range = end - start;
  const increment = range / (duration / 16);
  let current = start;

  const timer = setInterval(() => {
    current += increment;
    if (
      (increment > 0 && current >= end) ||
      (increment < 0 && current <= end)
    ) {
      current = end;
      clearInterval(timer);
    }
    if (id === "totalRevenue") {
      element.textContent = "$" + Math.floor(current).toLocaleString();
    } else if (id === "totalOrders") {
      element.textContent = Math.floor(current).toLocaleString();
    } else {
      element.textContent = Math.floor(current);
    }
  }, 16);
}

// Initialize Dashboard
document.addEventListener("DOMContentLoaded", function () {
  // Animate stat cards

  if (totalOrders) {
    animateValue("totalOrders", 0, 1547, 1000);
  }

  if (totalRevenue) {
    animateValue("totalRevenue", 0, 24580, 1200);
  }

  if (activeRiders) {
    animateValue("activeRiders", 0, 87, 800);
  }

  // Simulate real-time updates
  if (totalOrders) {
    setInterval(() => {
      const currentOrders = parseInt(
        document.getElementById("totalOrders").textContent.replace(",", "")
      );
      animateValue(
        "totalOrders",
        currentOrders,
        currentOrders + Math.floor(Math.random() * 5),
        500
      );
    }, 5000);
  }
});

// Navigation
function showSection(section) {
  // Update active nav link
  document.querySelectorAll(".nav-link").forEach((link) => {
    link.classList.remove("active");
  });
  event.target.closest(".nav-link").classList.add("active");

  // Here you would implement actual section switching
  console.log("Switching to section:", section);
}

// Top Restaurants Chart
const topRestaurantsChartElement = document.getElementById(
  "topRestaurantsChart"
);
if (topRestaurantsChartElement) {
  const topRestaurantsCtx = topRestaurantsChartElement.getContext("2d");
  const topRestaurantsChart = new Chart(topRestaurantsCtx, {
    type: "bar",
    data: {
      labels: [
        "Pizza Palace",
        "Burger Haven",
        "Sushi World",
        "Taco Fiesta",
        "Chinese Garden",
      ],
      datasets: [
        {
          label: "Revenue",
          data: [45890, 38750, 62340, 29450, 41230],
          backgroundColor: [
            "rgba(102, 126, 234, 0.8)",
            "rgba(118, 75, 162, 0.8)",
            "rgba(255, 107, 53, 0.8)",
            "rgba(250, 112, 154, 0.8)",
            "rgba(67, 233, 123, 0.8)",
          ],
          borderRadius: 8,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      plugins: {
        legend: {
          display: false,
        },
        tooltip: {
          backgroundColor: "#16213e",
          titleColor: "#fff",
          bodyColor: "#fff",
          borderColor: "#FF6B35",
          borderWidth: 1,
          padding: 12,
          callbacks: {
            label: (context) =>
              "Revenue: $" + context.parsed.y.toLocaleString(),
          },
        },
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            color: "#a0a0a0",
            callback: (value) => "$" + (value / 1000).toFixed(0) + "k",
          },
          grid: {
            color: "rgba(255, 255, 255, 0.05)",
          },
        },
        x: {
          ticks: {
            color: "#a0a0a0",
          },
          grid: {
            display: false,
          },
        },
      },
    },
  });
}

// Peak Hours Chart

const peakHoursChartElement = document.getElementById("peakHoursChart");
if (peakHoursChartElement) {
  const peakHoursCtx = peakHoursChartElement.getContext("2d");
  const peakHoursChart = new Chart(peakHoursCtx, {
    type: "bar",
    data: {
      labels: ["6AM", "9AM", "12PM", "3PM", "6PM", "9PM", "12AM"],
      datasets: [
        {
          label: "Orders",
          data: [45, 120, 580, 320, 750, 890, 340],
          backgroundColor: "rgba(79, 172, 254, 0.8)",
          borderRadius: 8,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      plugins: {
        legend: {
          display: false,
        },
        tooltip: {
          backgroundColor: "#16213e",
          titleColor: "#fff",
          bodyColor: "#fff",
          borderColor: "#FF6B35",
          borderWidth: 1,
          padding: 12,
        },
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            color: "#a0a0a0",
          },
          grid: {
            color: "rgba(255, 255, 255, 0.05)",
          },
        },
        x: {
          ticks: {
            color: "#a0a0a0",
          },
          grid: {
            display: false,
          },
        },
      },
    },
  });
}

const togglePassword = document.getElementById("togglePassword");
const password = document.getElementById("password");

if (togglePassword) {
  togglePassword.addEventListener("click", function () {
    const type =
      password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    this.classList.toggle("bi-eye");
    this.classList.toggle("bi-eye-slash");
  });
}

// Password toggle for confirm password
const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");
const confirmPassword = document.getElementById("confirmPassword");

if (toggleConfirmPassword) {
  toggleConfirmPassword.addEventListener("click", function () {
    const type =
      confirmPassword.getAttribute("type") === "password" ? "text" : "password";
    confirmPassword.setAttribute("type", type);
    this.classList.toggle("bi-eye");
    this.classList.toggle("bi-eye-slash");
  });
}

// Gallery images
let galleryImages = [];

const galleryImage = document.getElementById("galleryImages");

if (galleryImage) {
  galleryImage.addEventListener("change", function (e) {
    const files = Array.from(e.target.files);
    files.forEach((file) => {
      const reader = new FileReader();
      reader.onload = function (e) {
        galleryImages.push(e.target.result);
        renderGallery();
      };
      reader.readAsDataURL(file);
    });
  });
}

function renderGallery() {
  const container = document.getElementById("galleryUpload");
  container.innerHTML = "";

  galleryImages.forEach((image, index) => {
    const item = document.createElement("div");
    item.className = "gallery-item";
    item.style.backgroundImage = `url(${image})`;

    const removeBtn = document.createElement("button");
    removeBtn.className = "remove-image";
    removeBtn.innerHTML = '<i class="fas fa-times"></i>';
    removeBtn.onclick = () => removeGalleryImage(index);

    item.appendChild(removeBtn);
    container.appendChild(item);
  });

  const addItem = document.createElement("div");
  addItem.className = "gallery-item add-gallery-item";
  addItem.onclick = () => document.getElementById("galleryImages").click();
  addItem.innerHTML = '<i class="fas fa-plus"></i><p>Add Images</p>';
  container.appendChild(addItem);
}

function removeGalleryImage(index) {
  galleryImages.splice(index, 1);
  renderGallery();
}

  console.log("Script loaded successfully");
  const Images = document.getElementById("Images");
  const preview = document.getElementById("imagePreview");

  console.log(Images);
  console.log(preview);
  console.log(document.getElementById("Images"));
  console.log(document.getElementById("imagePreview"));

  if (!Images || !preview) return;

  // Open file dialog when preview is clicked
  preview.addEventListener("click", () => {
    Images.click();
  });

  // Preview image after selection
  Images.addEventListener("change", function (e) {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function (event) {
      preview.style.backgroundImage = `url(${event.target.result})`;
      preview.classList.add("has-image");
      preview.innerHTML = ""; // remove icon/text
    };
    reader.readAsDataURL(file);
  });


  preview.addEventListener("dragover", (e) => {
    e.preventDefault();
    preview.classList.add("dragging");
  });

  preview.addEventListener("dragleave", () => {
    preview.classList.remove("dragging");
  });

  preview.addEventListener("drop", (e) => {
    e.preventDefault();
    preview.classList.remove("dragging");

    const file = e.dataTransfer.files[0];
    if (!file) return;

    Images.files = e.dataTransfer.files;
    Images.dispatchEvent(new Event("change"));
  });


 const loyalty_tier_card = document.querySelectorAll('.loyalty-tier-card');

 if (loyalty_tier_card) {
   loyalty_tier_card.forEach(card => {
        card.addEventListener('click', function() {
            loyalty_tier_card.forEach(c => c.classList.remove('active'));
            this.classList.add('active');
            selectedTier = this.dataset.tier;
        });
    });
 }


});
