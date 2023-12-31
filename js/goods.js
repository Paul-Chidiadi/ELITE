//PRODUCT COUNTERS
const one = document.querySelector("#one");
const two = document.querySelector("#two");
const three = document.querySelector("#three");
const four = document.querySelector("#four");
const five = document.querySelector("#five");
//PRODUCTS LAYOUT
const prod1 = document.querySelector("#prod1");
const prod2 = document.querySelector("#prod2");
const prod3 = document.querySelector("#prod3");
const prod4 = document.querySelector("#prod4");
const prod5 = document.querySelector("#prod5");

//CHECK IF DATABASE STILL CONTAINS PRODUCTS
setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../CRUD/crud.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data.includes("No more products found!")) {
          two.style.display = "none";
          three.style.display = "none";
          four.style.display = "none";
          five.style.display = "none";
        } else {
        }
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("check=");
}, 600);
setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../CRUD/crud.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data.includes("No more products found!")) {
          three.style.display = "none";
          four.style.display = "none";
          five.style.display = "none";
        } else {
        }
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("check3=");
}, 600);
setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../CRUD/crud.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data.includes("No more products found!")) {
          four.style.display = "none";
          five.style.display = "none";
        } else {
        }
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("check4=");
}, 600);
setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../CRUD/crud.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data.includes("No more products found!")) {
          five.style.display = "none";
        } else {
        }
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("check5=");
}, 600);

one.onclick = () => {
  prod1.classList.add("active");
  prod2.classList.remove("active");
  prod3.classList.remove("active");
  prod4.classList.remove("active");
  prod5.classList.remove("active");
};
two.onclick = () => {
  prod1.classList.remove("active");
  prod2.classList.add("active");
  prod3.classList.remove("active");
  prod4.classList.remove("active");
  prod5.classList.remove("active");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../CRUD/crud.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        prod2.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("cate2=");
};
three.onclick = () => {
  prod1.classList.remove("active");
  prod2.classList.remove("active");
  prod3.classList.add("active");
  prod4.classList.remove("active");
  prod5.classList.remove("active");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../CRUD/crud.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        prod3.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("cate3=");
};
four.onclick = () => {
  prod1.classList.remove("active");
  prod2.classList.remove("active");
  prod3.classList.remove("active");
  prod4.classList.add("active");
  prod5.classList.remove("active");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../CRUD/crud.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        prod4.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("cate4=");
};
five.onclick = () => {
  prod1.classList.remove("active");
  prod2.classList.remove("active");
  prod3.classList.remove("active");
  prod4.classList.remove("active");
  prod5.classList.add("active");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../CRUD/crud.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        prod5.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("cate5=");
};

//GET PRODUCTS FROM DATABASE
setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../CRUD/crud.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        prod1.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("category=");
}, 5000);
