import axios from 'axios'
import Cookie from 'js-cookie'

const baseURL = 'http://localhost:8000/api'
const token = Cookie.get('token')
const JSONHeader = { 
  'Content-type': 'application/json',
  'Authorization': token
}

const formDataHeader = {
  'Content-type': 'application/x-www-form-urlencoded',
  'Authorization': token
}

export const postData = (payload) => {
  const config = {
    url: `${baseURL}/step1`,
    method: 'post',
    headers: JSONHeader,
    data: payload
  };
  return axios(config)
}

export const postDataStep2 = (payload) => {
  // console.log('--->', payload.user_id)
  let data = new FormData()
  data.append('user_id', payload.user_id)
  data.append('identity_card', payload.identity_card)
  data.append('fullname', payload.fullname)
  data.append('email', payload.email)
  data.append('phone_number', payload.phone_number)
  data.append('domicile', payload.domicile)
  data.append('domicile_city', payload.domicile_city)
  data.append('age', payload.age)
  data.append('identity_card_photo', payload.identity_card_photo)
  // console.log('---> ini', data)
    
  const config = {
    url: `${baseURL}/step2`,
    method: 'post',
    headers: formDataHeader,
    data: data
  };
  return axios(config)
}