import * as yup from 'yup'

export const checkoutClientValidator = yup.object().shape({
    name: yup.string().required('Debe indicar un nombre'),
    street: yup.string().required('Debe indicar una calle'),
    number: yup.number().required('Debe indicar un número').integer('El número debe ser un número entero').positive('El número debe ser positivo').max(99999),
    postal_code: yup.number().required('Debe indicar un código postal').integer('El código postal debe ser un número entero').positive('El código postal debe ser positivo').max(99999),
    province: yup.string().required('Debe indicar la provincia'),
    country: yup.string().required('Debe indicar el país'),
    email: yup.string().required('Debe indicar el email').email('El formato de email no es válido'),
})