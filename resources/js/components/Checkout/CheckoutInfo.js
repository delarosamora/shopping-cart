import { Col, Row } from "react-bootstrap"
import { CartProducts } from "../Cart/CartProducts"
import { CartStatusBadge } from "./CartStatusBadge"
import { CheckoutClient } from "./CheckoutClient"

export const CheckoutInfo = ({cart, addProduct, deleteProduct, saveClient}) => {
    return(
        <>
        <Row className="p-3 text-center mw-100">
            <h1>Checkout carrito</h1>
        </Row>
        <Row className="text-center mw-100">
            <CartStatusBadge cart={cart} />
        </Row>
        <Row xs="1" md="2" className="p-3 mw-100">
            <Col as="section" className="p-2">
                <CheckoutClient client={cart?.client} saveClient={saveClient} cart={cart} />
            </Col>
            <Col as="section" className="p-2">
                <CartProducts cart={cart} addProduct={addProduct} deleteProduct={deleteProduct} isCheckout />
            </Col>
        </Row>
        </>
    )
}