import * as yup from 'yup'

export const productCartValidator = yup.object().shape({
    quantity: yup.number().required('Debe introducir una cantidad').integer('La cantidad debe ser un número entero').positive('La cantidad debe ser positiva').max(100, 'Máximo 100 unidades'),
    productId: yup.number().required('El producto es obligatorio').integer('El ID del producto debe ser un número entero').positive('El ID del producto debe ser positivo')
})