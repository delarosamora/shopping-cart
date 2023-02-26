import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import { getProductsApi } from '../api/ProductApi';
import { addProductToCartApi, createCartApi, deleteProductFromCartApi, getPendingCartApi } from '../api/ShoppingCartApi';
import { showErrorNotification, showOkNotification } from '../helpers/Notify';
import { Cart } from './Cart/Cart';
import { Products } from './Products/Products';
import 'bootstrap/dist/css/bootstrap.min.css'

const ProductPage = () => {

    const [products, setProducts] = useState([]);
    const [cart, setCart] = useState(null)

    useEffect(() => {
        getProductsApi().then(fetchedProducts => {
            setProducts(fetchedProducts)
        })

        getPendingCartApi().then(fetchedCart => {
            setCart(fetchedCart)
        })
        .catch((error) => {
            console.log(error)
        })
    }, [])


    const setProductQuantity = (productId, quantity) => {
        if (cart === null || cart === undefined){
            createCartApi()
            .then(createdCart => createdCart)
            .then((createdCart) => addProductToCartApi(createdCart.id, productId, quantity))
            .then(createdCart => {setCart(createdCart)})
            .then(showOkNotification('Carrito creado con exito'))
            .catch((error) => {
                showErrorNotification("Error al crear carrito", error.message)
            })
        }
        else{
            addProductToCartApi(cart.id, productId, quantity)
            .then(updatedCart => setCart(updatedCart))
            .then(showOkNotification('Carrito', 'Producto añadido con exito'))
            .catch((error) => {
                showErrorNotification("Error al añadir producto", error.message)
            })
        }
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

    return (
        <>
        <Cart cart={cart} addProduct={setProductQuantity} deleteProduct={deleteProduct} />
        <Products products={products} setProductQuantity={setProductQuantity} />
        </>
    );
}

export default ProductPage;

if (document.getElementById('product-page')) {
    ReactDOM.render(<ProductPage />, document.getElementById('product-page'));
}
