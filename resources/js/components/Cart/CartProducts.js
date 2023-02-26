import { useState } from "react"
import { Button, ListGroup } from "react-bootstrap"
import { PencilSquare } from "react-bootstrap-icons"
import { cartStatus } from "../../cartStatus"
import { CartDeleteProductForm } from "./CartDeleteProductForm"
import { CartProductInline } from "./CartProductInline"
import { CartProductInlineForm } from "./CartProductInlineForm"

export const CartProducts = ({cart, addProduct, deleteProduct, isCheckout=false}) => {
    const [editMode, setEditMode] = useState(false)
    if (cart === null || cart === undefined){
        return null
    }
    return(
        <ListGroup>
            <ListGroup.Item>
                {(!editMode && cart.status_id != cartStatus.paymentSuccessful) && <p className="text-end m-0"><Button variant="warning" onClick={() => setEditMode(true)}><PencilSquare /> Editar carrito</Button></p>}
            </ListGroup.Item>
            {cart.products.map(product => (
                editMode
                ? <CartProductInlineForm product={product} addProduct={addProduct} setEditMode={setEditMode} />
                : <CartProductInline cart={cart} product={product} deleteProduct={deleteProduct} />))}
            {!isCheckout && <ListGroup.Item><Button href="checkout">Terminar compra</Button></ListGroup.Item>}
        </ListGroup>
    )
}