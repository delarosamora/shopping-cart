import { Field, Form, Formik } from "formik"
import { Button } from "react-bootstrap"
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
            <Field type="number" name="quantity" />
            <Button variant="success" type="submit"><CheckCircleFill /></Button>
        </Form>
        )}
        </Formik>
    )
}