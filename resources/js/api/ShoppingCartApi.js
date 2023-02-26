export const getPendingCartApi = async () => {
    
    const requestOptions = {
      method: 'GET',
      credentials: "same-origin",
      redirect: 'follow'
    };
    const response = await fetch(`${location.origin}/api/cart/pending-cart/get`, requestOptions)

    if (!response.ok){
      throw new Error('No hay carrito en progreso');
    }

    return response.json()
}

export const createCartApi = async() => {

  let formdata = new FormData();
  formdata.append("status_id", 1);
  formdata.append("total", 0);

  const requestOptions = {
    method: 'POST',
    credentials: "same-origin",
    body: formdata,
    redirect: 'follow'
  };

  const response = await fetch(`${location.origin}/api/cart/create`, requestOptions)

  return response.json()
}

export const addProductToCartApi = async (cartId, productId, quantity) => {
  let formdata = new FormData();
  formdata.append("product_id", productId);
  formdata.append("quantity", quantity);

  const requestOptions = {
    method: 'POST',
    body: formdata,
    redirect: 'follow',
    credentials: "same-origin",
  };

  const response = await fetch(`${location.origin}/api/cart/${cartId}/set-product-quantity`, requestOptions)
  if (!response.ok){
    const errors = await response.json()
    throw new Error(errors);
  }

  return response.json()
}

export const deleteProductFromCartApi = async(cartId, productId) => {
  let formdata = new FormData();
  formdata.append("product_id", productId);

  const requestOptions = {
    method: 'POST',
    body: formdata,
    redirect: 'follow',
    credentials: "same-origin",
  };

  const response = await fetch(`${location.origin}/api/cart/${cartId}/delete-product`, requestOptions)
  if (!response.ok){
    const errors = await response.json()
    throw new Error(errors);
  }

  return response.json()
}

export const saveClientApi = async(cartId, client) => {
  let formdata = new FormData();
  formdata.append("name", client.name);
  formdata.append("street", client.street);
  formdata.append("number", client.number);
  formdata.append("postal_code", client.postal_code);
  formdata.append("city", client.city);
  formdata.append("province", client.province);
  formdata.append("country", client.country);
  formdata.append("email", client.email);

  const requestOptions = {
    method: 'POST',
    body: formdata,
    redirect: 'follow',
    credentials: "same-origin",
  };

  const response = await fetch(`${location.origin}/api/cart/${cartId}/save-client`, requestOptions)
  if (!response.ok){
    const errors = await response.json()
    throw new Error(errors);
  }

  return response.json()
}

export const setStatusToCartApi = async(cartId, statusId) => {
  let formdata = new FormData();
  formdata.append("status_id", statusId);

  const requestOptions = {
    method: 'POST',
    body: formdata,
    redirect: 'follow',
    credentials: "same-origin",
  };

  const response = await fetch(`${location.origin}/api/cart/${cartId}/set-status`, requestOptions)
  if (!response.ok){
    const errors = await response.json()
    throw new Error(errors);
  }

  return response.json()
}
