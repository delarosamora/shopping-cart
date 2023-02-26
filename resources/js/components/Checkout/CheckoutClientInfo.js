import { ListGroupItem } from "react-bootstrap"

export const CheckoutClientInfo = ({client}) => {
    return(
        <>
            <ListGroupItem><strong>Nombre:</strong> {client?.name ?? '---'}</ListGroupItem>
            <ListGroupItem><strong>Calle:</strong> {client?.street ?? '---'}</ListGroupItem>
            <ListGroupItem><strong>Numero:</strong> {client?.number ?? '---'}</ListGroupItem>
            <ListGroupItem><strong>C. Postal:</strong> {client?.postal_code ?? '---'}</ListGroupItem>
            <ListGroupItem><strong>Ciudad:</strong> {client?.city ?? '---'}</ListGroupItem>
            <ListGroupItem><strong>Provincia:</strong> {client?.province ?? '---'}</ListGroupItem>
            <ListGroupItem><strong>País:</strong> {client?.country ?? '---'}</ListGroupItem>
            <ListGroupItem><strong>Email:</strong> {client?.email ?? '---'}</ListGroupItem>
        </>
    )
}