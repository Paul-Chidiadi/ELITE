const img = document.querySelector("#image");
const namie = document.querySelector("#name");
const price = document.querySelector("#price");
const qty = document.querySelector("#qty");
const prodId = document.querySelector("#id");
const addBtn = document.querySelector("#addbtn");

// Storing products added to cart on the user's device local storage USING INDEXEDDB

// Create an instance of a db object for us to store the open database in
let db;
// Open our database
const openRequest = window.indexedDB.open("elite_db", 1);
// error handler signifies that the database didn't open successfully
openRequest.addEventListener("error", () =>
  console.error("Database failed to open")
);

// success handler signifies that the database opened successfully
openRequest.addEventListener("success", () => {
  console.log("Database opened successfully");

  // Store the opened database object in the db variable. This is used a lot below
  db = openRequest.result;

  // Run the getAllCarItems() function to get the notes already in the IDB
  getAllCartItems();
});

// Set up the database tables if this has not already been done
openRequest.addEventListener("upgradeneeded", (e) => {
  // Grab a reference to the opened database
  db = e.target.result;

  // Create an objectStore to store our notes in (basically like a single table)
  // including a auto-incrementing key
  const objectStore = db.createObjectStore("elite", {
    keyPath: "id",
    autoIncrement: true,
  });

  // Define what data items the objectStore will contain
  objectStore.createIndex("image", "image", { unique: false });
  objectStore.createIndex("name", "name", { unique: false });
  objectStore.createIndex("price", "price", { unique: false });
  objectStore.createIndex("qty", "qty", { unique: false });
  objectStore.createIndex("prodId", "prodId", { unique: false });

  console.log("Database setup complete");
});

// Create a cick event handler so that when addbtn is clicked the addData() function is run
addBtn.addEventListener("click", addData);

// Define the addData() function
function addData(e) {
  // prevent default - we don't want the anchor tag to click in the conventional way
  e.preventDefault();

  // grab the values from the fields and store them in an object ready for being inserted into the DB
  const newItem = {
    image: img.getAttribute("src"),
    name: namie.textContent,
    price: price.textContent,
    qty: qty.value,
    prodId: prodId.value,
  };

  // open a read/write db transaction, ready for adding the data
  const transaction = db.transaction(["elite"], "readwrite");

  // call an object store that's already been added to the database
  const objectStore = transaction.objectStore("elite");

  // Make a request to add our newItem object to the object store
  const addRequest = objectStore.add(newItem);

  addRequest.addEventListener("success", () => {
    console.log("newItems added.");
  });

  // Report on the success of the transaction completing, when everything is done
  transaction.addEventListener("complete", () => {
    console.log("Transaction completed: database modification finished.");

    //animation for cart number to drop down when new item is added
    const top = document.querySelector(".top");
    top.style.display = "none";
    setTimeout(() => {
      top.style.display = "block";
    }, 1200);
    //display that item has been added
    const response = document.querySelector("#response");
    response.style.display = "block";
    response.textContent = "Item Added to Cart";
    setInterval(() => {
      response.style.display = "none";
    }, 6500);

    getAllCartItems();
  });

  transaction.addEventListener("error", () =>
    console.log("Transaction not opened due to error")
  );
}

// Get an array with all the data in objectStore
function getAllCartItems() {
  const request = db.transaction("elite").objectStore("elite").getAll();

  request.onsuccess = () => {
    const items = request.result;
    console.log(items);

    //get number of items in cart
    const cartNum = document.querySelector(".cartNum");
    let numOfItems = items.length;
    cartNum.textContent = numOfItems;
    //animation for cart number to drop down when new item is added
    const top = document.querySelector(".top");
    top.style.display = "none";
    setTimeout(() => {
      top.style.display = "block";
    }, 1200);
  };
  request.onerror = (err) => {
    console.error(`Error to get all items: ${err}`);
  };
}
