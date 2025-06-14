
    let btn = document.getElementById("showProductList");
    let spisok = document.getElementById("productList")
    let addProduct = document.getElementById("addProductForm")
    let btn5 = document.getElementById("UserList");
    let UsersList = document.getElementById("UserInfo");
    let btn2 = document.getElementById("showAddForm")
    
    btn.addEventListener("click", function () {
        addProduct.style.display = "none";
        spisok.style.display = "block";
        UsersList.style.display = "none";
    });
    
    
    
    btn2.addEventListener("click", function () {
        spisok.style.display = "none";
        addProduct.style.display = "block";
        UsersList.style.display = "none";
    });

    let btn3 = document.getElementById("editProduct")
    let btn4 = document.getElementById("closeEdit")
    let navPanel = document.getElementById("navPanelByID")
    let editProfile = document.getElementById("editModal")

    btn3.addEventListener("click", function () {
        spisok.style.display = "none";
        navPanel.style.display = "none";
        editProfile.style.display = "block";
    });

    btn4.addEventListener("click", function () {
        spisok.style.display = "block";
        navPanel.style.display = "flex";
        editProfile.style.display = "none";
        UsersList.style.display = "none";
    });



    btn5.addEventListener("click", function () {
        spisok.style.display = "none";
        editProfile.style.display = "none";
        addProduct.style.display = "none";
        UsersList.style.display = "block";
    });

  
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        const productTables = document.querySelectorAll(".product-spisok table");
    
        // Функция для поиска товаров
        searchInput.addEventListener("input", function () {
            const searchTerm = searchInput.value.toLowerCase(); // Получаем текст поиска и приводим к нижнему регистру
    
            productTables.forEach(table => {
                const productName = table.querySelector("td").textContent.toLowerCase(); // Название товара
                if (productName.includes(searchTerm)) {
                    table.style.display = ""; // Показываем товар, если он соответствует поиску
                } else {
                    table.style.display = "none"; // Скрываем товар, если он не соответствует поиску
                }
            });
        });
    });
