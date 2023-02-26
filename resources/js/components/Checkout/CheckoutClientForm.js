import { Field, Form, Formik } from "formik"
import { Alert, Button, Col, ListGroupItem, Row } from "react-bootstrap"
import { CheckCircleFill } from "react-bootstrap-icons"
import { checkoutClientValidator } from "../../validators/checkoutClientValidator"

export const CheckoutClientForm = ({client, saveClient, setEditMode}) => {
    return(
        <Formik
            initialValues={{
                name: client?.name,
                street: client?.street,
                number: client?.number,
                postal_code: client?.number,
                city: client?.city,
                province: client?.province,
                country: client?.country,
                email: client?.email,
            }}
            onSubmit={(client) => {
                saveClient(client)
                setEditMode(false)
            }}
            validationSchema={checkoutClientValidator}
        >
        {({errors, touched}) => (
        <Form>
            <ListGroupItem>
                {(errors.name && touched.name) && <Alert variant="danger">{errors.name}</Alert>}
                <Row>
                    <Col xs="4">
                        <strong>Nombre:</strong>
                    </Col>
                    <Col xs="8">
                        <Field type="text" name="name" className="form-control" />
                    </Col>
                </Row>
            </ListGroupItem>
            <ListGroupItem>
                {(errors.street && touched.street) && <Alert variant="danger">{errors.street}</Alert>}
                <Row>
                    <Col xs="4">
                        <strong>Calle:</strong>
                    </Col>
                    <Col xs="8">
                        <Field type="text" name="street" className="form-control" />
                    </Col>
                </Row>
            </ListGroupItem>
            <ListGroupItem>
                {(errors.number && touched.number) && <Alert variant="danger">{errors.number}</Alert>}
                <Row>
                    <Col xs="4">
                        <strong>Número:</strong>
                    </Col>
                    <Col xs="8">
                        <Field type="number" name="number" className="form-control" />
                    </Col>
                </Row>
            </ListGroupItem>
            <ListGroupItem>
                {(errors.postal_code && touched.postal_code) && <Alert variant="danger">{errors.postal_code}</Alert>}
                <Row>
                    <Col xs="4">
                        <strong>C. Postal:</strong>
                    </Col>
                    <Col xs="8">
                        <Field type="number" name="postal_code" className="form-control" />
                    </Col>
                </Row>
            </ListGroupItem>
            <ListGroupItem>
                {(errors.city && touched.city) && <Alert variant="danger">{errors.city}</Alert>}
                <Row>
                    <Col xs="4">
                        <strong>Ciudad:</strong>
                    </Col>
                    <Col xs="8">
                        <Field type="text" name="city" className="form-control" />
                    </Col>
                </Row>
            </ListGroupItem>
            <ListGroupItem>
                {(errors.province && touched.province) && <Alert variant="danger">{errors.province}</Alert>}
                <Row>
                    <Col xs="4">
                        <strong>Provincia:</strong>
                    </Col>
                    <Col xs="8">
                        <Field type="text" name="province" className="form-control" />
                    </Col>
                </Row>
            </ListGroupItem>
            <ListGroupItem>
                {(errors.country && touched.country) && <Alert variant="danger">{errors.country}</Alert>}
                <Row>
                    <Col xs="4">
                        <strong>País:</strong>
                    </Col>
                    <Col xs="8">
                        <Field type="text" name="country" className="form-control" />
                    </Col>
                </Row>
            </ListGroupItem>
            <ListGroupItem>
                {(errors.email && touched.email) && <Alert variant="danger">{errors.email}</Alert>}
                <Row>
                    <Col xs="4">
                        <strong>Email:</strong>
                    </Col>
                    <Col xs="8">
                        <Field type="text" name="email" className="form-control" />
                    </Col>
                </Row>
            </ListGroupItem>
            <ListGroupItem className="text-center">
                <Button variant="success" type="submit"><CheckCircleFill /> Guardar</Button>
            </ListGroupItem>
        </Form>
        )}
        </Formik>
    )
}