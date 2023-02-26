import { Button, Col, Row } from "react-bootstrap"

export const PayCheckoutButton = ({cart, payCart}) => {
    const canNotPay = () => (cart.client_id == null || cart.total <= 0)
    return(
        <Row className="mw-100">
            <Col xs="7" md="5" className="m-auto text-center">
                <Button variant="success" disabled={canNotPay()} onClick={() => payCart()}>
                    {canNotPay()
                    ? 'Completa todos los campos para pagar la compra'
                    : 'Pagar la compra'
                    }
                </Button>
            </Col>
        </Row>
    )
}