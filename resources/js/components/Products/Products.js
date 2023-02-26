import { Row } from "react-bootstrap"
import { Product } from "./Product"

export const Products = ({products, setProductQuantity}) => {
    return(
        <>
        <Row className="text-center p-3 mw-100">
            <h1>Productos</h1>
        </Row>
        <Row xs={1} md="2" lg={3} className="g-3 p-3 m-0">
            {products.map(product => <Product key={product.id} product={product} setProductQuantity={setProductQuantity} />)}
        </Row>
        </>
    )
}