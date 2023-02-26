import { useState } from "react"
import { Button, Col, Row } from "react-bootstrap"
import { CartFill } from "react-bootstrap-icons"
import { CartProducts } from "./CartProducts"

export const Cart = ({cart, addProduct, deleteProduct, isCheckout=false}) => {
    const [showCart, setShowCart] = useState(false)
    return(
        <Row className="bg-secondary p-2 m-0">
            <Col className="m-auto text-center">
            <Button onClick={() => setShowCart(!showCart)}>
                Ver carrito <CartFill /> {cart === null || cart === undefined ? "(0)" : `(${cart.products.length}) ${cart.total}€`}
            </Button>
                {showCart && <CartProducts cart={cart} addProduct={addProduct} deleteProduct={deleteProduct} isCheckout={isCheckout} />}
            </Col>
        </Row>
    )
}