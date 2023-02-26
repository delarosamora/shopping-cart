import { useState } from "react"
import { Button, Col, ListGroup, Row } from "react-bootstrap"
import { PencilSquare } from "react-bootstrap-icons"
import { cartStatus } from "../../cartStatus"
import { CheckoutClientForm } from "./CheckoutClientForm"
import { CheckoutClientInfo } from "./CheckoutClientInfo"

export const CheckoutClient = ({client, saveClient, cart}) => {
    const [editMode, setEditMode] = useState(false)
    return(
        <ListGroup variant="flusg" className="p-1 border shadow">
            <ListGroup.Item>
                <Row>
                    <Col>
                        <strong><h2>Datos de envío</h2></strong>
                    </Col>
                    <Col>
                    {(!editMode && cart.status_id != cartStatus.paymentSuccessful) && <p className="text-end m-0"><Button variant="warning" onClick={() => setEditMode(true)}><PencilSquare /> Editar datos</Button></p>}
                    </Col>
                </Row>
            </ListGroup.Item>
            {editMode
                ?<CheckoutClientForm client={client} saveClient={saveClient} setEditMode={setEditMode} />
                :<CheckoutClientInfo client={client} />
            }
        </ListGroup>
    )
}