import { Field, Form, Formik } from "formik"
import { Button, Col, Row } from "react-bootstrap"
import { CheckCircleFill } from "react-bootstrap-icons"
import { productCartValidator } from "../../validators/productCartValidator"

export const CartProductForm = ({product, addProduct}) => {
    return(
        <Formik
            initialValues={{productId: product.id, quantity: 0}}
            onSubmit={(values) => {addProduct(values.productId, values.quantity)}}
            validationSchema={productCartValidator}
        >
        {({errors, touched}) => (
        <Form>
            {(errors.quantity && touched.quantity) && <p className="alert alert-danger">{errors.quantity}</p>}
            <Field type="hidden" name="productId" />
            <Row>
                <Col xs="9">
                    <Field type="number" name="quantity" className="form-control text-center" />
                </Col>
                <Col xs="3">
                    <Button variant="success" type="submit"><CheckCircleFill /></Button>
                </Col>
            </Row>
        </Form>
        )}
        </Formik>
    )
}