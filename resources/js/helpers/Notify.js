import Notify from 'simple-notify'
import 'simple-notify/dist/simple-notify.min.css'

export const showOkNotification = (title, text='') => {
    new Notify({
        status: 'success',
        title: title,
        text: text,
        autoclose: true
    })
}

export const showErrorNotification = (title, text='') => {
    new Notify({
        status: 'error',
        title: title,
        text: text,
        autoclose: true
    })
}