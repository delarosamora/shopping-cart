import { useState } from "react"
import { Button, Card, Col } from "react-bootstrap"
import { CartPlusFill } from "react-bootstrap-icons"
import { CartProductForm } from "../Cart/CartProductForm"

export const Product = ({product, setProductQuantity}) => {
    const [showAdd, setShowAdd] = useState(false)
    return(
        <Col>
            <Card className="h-100">
            <Card.Img variant="top" src={`storage/img/products/${product.image}`} style={{height: "10rem", objectFit: "cover"}} />
            <Card.Body className="text-center">
                <Card.Title>{product.name} {product.price}€</Card.Title>
                <Card.Text>{product.description ?? '---'}</Card.Text>
                <Button onClick={() => {setShowAdd(!showAdd)}}>
                    <CartPlusFill /> Añadir al carrito
                </Button>
                {showAdd && <CartProductForm product={product} addProduct={setProductQuantity} />}
            </Card.Body>
            </Card>
        </Col>
    )
}