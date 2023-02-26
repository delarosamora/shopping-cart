import { Field, Form, Formik } from "formik"
import { Alert, Button, ListGroupItem } from "react-bootstrap"
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
                <strong>Nombre:</strong> <Field type="text" name="name" />
            </ListGroupItem>
            <ListGroupItem>
                {(errors.street && touched.street) && <Alert variant="danger">{errors.street}</Alert>}
                <strong>Calle:</strong> <Field type="text" name="street" />
            </ListGroupItem>
            <ListGroupItem>
                {(errors.number && touched.number) && <Alert variant="danger">{errors.number}</Alert>}
                <strong>Número:</strong> <Field type="number" name="number" />
            </ListGroupItem>
            <ListGroupItem>
                {(errors.postal_code && touched.postal_code) && <Alert variant="danger">{errors.postal_code}</Alert>}
                <strong>C. Postal:</strong> <Field type="number" name="postal_code" />
            </ListGroupItem>
            <ListGroupItem>
                {(errors.city && touched.city) && <Alert variant="danger">{errors.city}</Alert>}
                <strong>Ciudad:</strong> <Field type="text" name="city" />
            </ListGroupItem>
            <ListGroupItem>
                {(errors.province && touched.province) && <Alert variant="danger">{errors.province}</Alert>}
                <strong>Provincia:</strong> <Field type="text" name="province" />
            </ListGroupItem>
            <ListGroupItem>
                {(errors.country && touched.country) && <Alert variant="danger">{errors.country}</Alert>}
                <strong>País:</strong> <Field type="text" name="country" />
            </ListGroupItem>
            <ListGroupItem>
                {(errors.email && touched.email) && <Alert variant="danger">{errors.email}</Alert>}
                <strong>Email:</strong> <Field type="text" name="email" />
            </ListGroupItem>
            <Button variant="success" type="submit"><CheckCircleFill /> Guardar</Button>
        </Form>
        )}
        </Formik>
    )
}