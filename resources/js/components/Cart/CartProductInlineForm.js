import { Field, Form, Formik } from "formik"
import { Alert, Button, Col, Image, ListGroupItem, Row } from "react-bootstrap"
import { CheckCircleFill } from "react-bootstrap-icons"
import { productCartValidator } from "../../validators/productCartValidator"

export const CartProductInlineForm = ({product, addProduct, setEditMode}) => {
    return(
        <ListGroupItem>
            <Formik
            initialValues={{productId: product.id, quantity: product.pivot.quantity}}
            onSubmit={(values) => {
                addProduct(values.productId, values.quantity)
                setEditMode(false)
            }}
            validationSchema={productCartValidator}
            >
            {({errors, touched}) => (
            <Form>
                {(errors.quantity && touched.quantity) && <Alert variant="danger">{errors.quantity}</Alert>}
                <Field type="hidden" name="productId" />
                <Row className="align-items-center">
                    <Col xs="3">
                        <Image thumbnail={true} src={`storage/img/products/${product.image}`} class="object-fit-cover" style={{height: "5rem", width: "5rem"}} />
                    </Col>
                    <Col xs="4">
                        {`${product.name} (${product.price})€`}
                    </Col>
                    <Col xs="3">
                        <Field className="mw-100 form-control text-center" type="number" name="quantity" />
                    </Col>
                    <Col xs="2">
                        <Button variant="success" type="submit"><CheckCircleFill /></Button>
                    </Col>
                </Row>
                </Form>)}
            </Formik>
        </ListGroupItem>
    )
}