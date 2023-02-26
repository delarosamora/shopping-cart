import { Field, Form, Formik } from "formik"
import { Button } from "react-bootstrap"
import { Trash3Fill } from "react-bootstrap-icons"

export const CartDeleteProductForm = ({product, deleteProduct}) => {
    return(
        <Formik
            initialValues={{productId: product.id}}
            onSubmit={(values) => {deleteProduct(values.productId)}}
        >
            <Form>
                <Field type="hidden" name="productId" />
                <Button variant="danger" type="submit"><Trash3Fill /></Button>
            </Form>

        </Formik>
    )
}