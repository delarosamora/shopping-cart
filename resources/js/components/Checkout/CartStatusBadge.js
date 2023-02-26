import { Badge } from "react-bootstrap";
import { cartStatus } from "../../cartStatus";

export const CartStatusBadge = ({cart}) => {
    switch(cart.status_id){
        case cartStatus.inProgress:
            return(
                <h3>
                    <Badge>En progreso</Badge>
                </h3>
            )
        case cartStatus.paymentSuccessful:
            return(
                <h3>
                    <Badge bg="success">Pago realizado. Consulte su email</Badge>
                </h3>
            )
        case cartStatus.paymentError:
            return(
                <h3>
                    <Badge bg="danger">Error en el pago</Badge>
                </h3>
            )
        default:
            return null
    }
}