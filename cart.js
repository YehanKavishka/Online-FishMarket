//console.log("JS");
let carts = document.querySelectorAll('.add-cart');

let products = [
    {
        name:'Balayaa',
        tag: 'balayaa',
        price: 600,
        inCart: 0
    },
    {
        name:'Alagoduwaa',
        tag: 'alagoduwaa',
        price: 450,
        inCart: 0
    },
    {
        name:'Bollaa',
        tag: 'bollaa',
        price: 300,
        inCart: 0
    },
    {
        name:'Hurulla',
        tag: 'hurulla',
        price: 400,
        inCart: 0
    }
];

for(let i=0; i<carts.length; i++){
    carts[i].addEventListener('click',() =>{
        cartNum(products[i]);
        totalCost(products[i])
    })
}

function onLoardCartNumber(){
    let productNum = localStorage.getItem('cartNumbers');
    if(productNum) {
        document.querySelector('.cart span').textContent = productNum;

    }
}

function cartNum(product){
    
    let productNum = localStorage.getItem('cartNumbers');
    productNum = parseInt(productNum);

    if(productNum){
        localStorage.setItem('cartNumbers',productNum + 1);
        document.querySelector('.cart span').textContent = productNum + 1;
    }
    else{
        localStorage.setItem('cartNumbers', 1);
        document.querySelector('.cart span').textContent = 1;

    }
    setItems(product);
   
}

function setItems(product){
    let cartItems = localStorage.getItem('productsInCart');
    cartItems= JSON.parse(cartItems);

    console.log("my cart are ",cartItems);
    

    if(cartItems != null){
        if(cartItems[product.tag] == undefined){
            cartItems= {
                ...cartItems,
                [product.tag]: product
            }
        }
        cartItems[product.tag].inCart += 1;
    }else{
        product.inCart = 1;
        cartItems = {
            [product.tag]:product
        }
    }
    
    localStorage.setItem("productsInCart",JSON.stringify(cartItems));
}

function totalCost(product){
    
    let cartCost = localStorage.getItem('totalCost');
    console.log(typeof cartCost);

    if(cartCost != null){
        cartCost = parseInt(cartCost);
        localStorage.setItem("totalCost",cartCost + product.price);
    }else{
        localStorage.setItem("totalCost",product.price);
    }

}

function displayCart(){
    let cartItems = localStorage.getItem("productsInCart");
    cartItems = JSON.parse(cartItems);
    console.log(cartItems);
    let productsContainer = document.querySelector(".products");
    let cartCost = localStorage.getItem('totalCost');

    if (cartItems && productsContainer){
        productsContainer.innerHTML = '';
        Object.values(cartItems).map(item => {
            productsContainer.innerHTML += `
            <div class="product">
                <ion-icon name="close-circle"></ion-icon>
                <img src="./Images/${item.tag}.jpg">
                <span>${item.name}</span>
            </div>
            <div class= "price">Rs.${item.price},00</div>
            <div class= "quantity">
                <ion-icon name="arrow-dropleft-circle"></ion-icon>
                <span>${item.inCart}</span>
                <ion-icon name="arrow-dropright-circle"></ion-icon>
            </div>
            <div class="total">
                Rs.${item.inCart * item.price},00
            </div>
            `
        });

        productsContainer.innerHTML += `
            <div class="basketTotalContainer">
                <h7 class="basketTotaleTitele">
                    Basket Total
                </h7>
                <h7 class="basketTotal">
                    Rs.${cartCost},00
                </h7>

        `;
    }
}

onLoardCartNumber();
displayCart();