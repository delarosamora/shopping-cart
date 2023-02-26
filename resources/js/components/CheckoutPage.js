import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import { addProductToCartApi, deleteProductFromCartApi, getPendingCartApi, saveClientApi, setStatusToCartApi } from '../api/ShoppingCartApi';
import { cartStatus } from '../cartStatus';
import { showErrorNotification, showOkNotification } from '../helpers/Notify';
import { Cart } from './Cart/Cart';
import { BackToProductPage } from './Checkout/BackToProductPage';
import { CheckoutInfo } from './Checkout/CheckoutInfo';
import { PayCheckoutButton } from './Checkout/PayCheckoutButton';
import 'bootstrap/dist/css/bootstrap.min.css'

const CheckoutPage = () => {
    const [cart, setCart] = useState(null)

    useEffect(() => {
        getPendingCartApi().then(fetchedCart => {
            setCart(fetchedCart)
        })
        .catch((error) => {
            window.location.href = "/products"
            console.log(error)
        })
    }, [])


    const setProductQuantity = (productId, quantity) => {
        addProductToCartApi(cart.id, productId, quantity)
        .then(updatedCart => setCart(updatedCart))
        .then(showOkNotification('Carrito', 'Producto añadido con exito'))
        .catch((error) => {
            showErrorNotification("Error al añadir producto", error.message)
        })
    }

    const deleteProduct = (productId) => {
        if (cart === null || cart === undefined){
            return
        }
        deleteProductFromCartApi(cart.id, productId)
        .then(updatedCart => setCart(updatedCart))
        .then(showOkNotification("Producto borrado con exito"))
        .catch((error) => {showErrorNotification("Error al borrar producto", error.message)})
    }

    const saveClient = (client) => {
        saveClientApi(cart.id, client)
        .then(updatedCart => {
            console.log("despues de guardar cliente", updatedCart)
            setCart(updatedCart)})
        .then(showOkNotification("Cliente actualizado"))
        .catch((error) => {showErrorNotification("Error al actualizar cliente", error.message)})
    }

    const payCart = () => {
        setStatusToCartApi(cart.id, cartStatus.paymentSuccessful)
        .then(updatedCart => setCart(updatedCart))
        .then(showOkNotification('Carro pagado con exito'))
        .catch((error) => {showErrorNotification("Error al pagar", error.message)})
    }

    if (cart == null){
        return null
    }

    return (
        <>
        {cart.status_id != cartStatus.paymentSuccessful && <Cart cart={cart} addProduct={setProductQuantity} deleteProduct={deleteProduct} isCheckout />}
        <BackToProductPage />
        {cart.status_id != cartStatus.paymentSuccessful && <PayCheckoutButton cart={cart} payCart={payCart} />}
        <CheckoutInfo cart={cart} deleteProduct={deleteProduct} addProduct={setProductQuantity} saveClient={saveClient} />
        </>
    );
}

export default CheckoutPage;

if (document.getElementById('checkout-page')) {
    ReactDOM.render(<CheckoutPage />, document.getElementById('checkout-page'));
}
