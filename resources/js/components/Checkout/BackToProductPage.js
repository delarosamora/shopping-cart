import { Button, Col, Row } from "react-bootstrap"
import { ArrowLeft } from "react-bootstrap-icons"

export const BackToProductPage = () => {
    return(
        <Row className="p-3 mw-100">
            <Col xs="8" md="6" className="m-auto text-center">
            <Button href="products"><ArrowLeft /> Volver a productos</Button>
            </Col>
        </Row>
    )
}