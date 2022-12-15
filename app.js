'use strict';

const buyBtns = document.querySelectorAll('.buy-btn');
const cartBtn = document.querySelector('.cart-btn');

const baseUrl = 'http://localhost:8080/assignments/PHP%20PROJECT/';

function fetchcall(data) {
  location.replace(
    `${baseUrl}orderSuccess.php?id=${data.id}&name=${data.name}&price=${data.price}`
  );
  // window.open(
  //   // 'https://support.wwf.org.uk/earth_hour/index.php?type=individual',
  //   `${baseUrl}orderSuccess.php?id=${data.id}&name=${data.name}&price=${data.price}`,
  //   '_blank' // <- This is what makes it open in a new window.
  // );
}

cartBtn.addEventListener('click', (e) => {
  console.log('click');
  location.replace(`${baseUrl}cart.php`);
});

buyBtns.forEach((btn) => {
  btn.addEventListener('click', (e) => {
    const product = e.target.closest('.product');
    const productId = product.dataset.id;
    const productName = product.querySelector('.product-name').textContent;
    const productPrice = product
      .querySelector('.product-price')
      .textContent.slice(1);

    const data = { id: productId, name: productName, price: productPrice };

    fetchcall(data);
  });
});
