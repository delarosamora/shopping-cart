import { Col, Image, ListGroupItem, Row } from "react-bootstrap"
import { BagCheckFill } from "react-bootstrap-icons"
import { cartStatus } from "../../cartStatus"
import { CartDeleteProductForm } from "./CartDeleteProductForm"

export const CartProductInline = ({product, deleteProduct, cart}) => {
    return(
        <ListGroupItem>
            <Row className="align-items-center">
                <Col xs="3">
                    <Image thumbnail={true} src={`storage/img/products/${product.image}`} className="object-fit-cover" style={{height: "5rem", width: "5rem"}} />
                </Col>
                <Col xs="5">
                    {`${product.name} (${product.price})€`}
                </Col>
                <Col xs="2">
                    <p>{product.pivot.quantity}</p>
                </Col>
                <Col xs="2">
                    {cart.status_id == cartStatus.paymentSuccessful
                    ? <BagCheckFill />
                    : <CartDeleteProductForm product={product} deleteProduct={deleteProduct} />
                    }
                </Col>
            </Row>
        </ListGroupItem>
    )
}