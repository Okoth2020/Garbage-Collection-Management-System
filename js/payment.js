const packages = {
  residential: 30,
  business: 100,
  industrial: 150,
  construction: 200,
};

function paypalPayment() {
  const amount_element = document.getElementById("amount-value");
  const amount_dollars = parseFloat(amount_element.textContent);

  paypal
    .Buttons({
      style: {
        layout: "vertical",
        color: "gold",
        shape: "pill",
        label: "pay",
      },
      createOrder: function (data, actions) {
        return actions.order.create({
          purchase_units: [
            {
              reference_id: "d9f80740-38f0-11e8-b467-0ed5f89f718b",
              amount: {
                currency_code: "USD",
                value: amount_dollars.toString(),
              },
            },
          ],
        });
      },
      onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
          alert("Transaction completed by " + details.payer.name.given_name);
          const payment_container =
            document.querySelector(".payment-container");
          const payment_method = document.getElementById("payment-method");
          const payment_id = document.getElementById("payment-id");
          const payment_amount = document.getElementById("payment-amount");
          const save_button = document.getElementById("save");
          payment_method.value = "paypal";
          payment_id.value = data.orderID;
          payment_amount.value = `$${amount_dollars}`;
          payment_container.style.display = "none";
          save_button.disabled = false;
        });
      },
    })
    .render("#paypal-payment");
}

function closePaymentContainer() {
  const close = document.querySelector(".payment-close img");
  close.addEventListener("click", () => {
    const payment_container = document.querySelector(".payment-container");
    payment_container.style.display = "none";
  });
}

function main() {
  document.addEventListener("DOMContentLoaded", () => {
    const package_element = document.getElementById("package");
    const subscription = package_element.value;
    const amount_value = document.getElementById("amount-value");
    amount_value.textContent = packages[subscription];
    closePaymentContainer();
    paypalPayment();
  });
}

main();
