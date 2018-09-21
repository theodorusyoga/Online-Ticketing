import axios from 'axios'
import Cookie from 'js-cookie'

const baseURL = 'http://localhost:8000/api'
const token = Cookie.get('token')
const header = { 
  'Content-type': 'application/json',
  'Authorization': token
}

export const postData = (payload) => {
  const config = {
    url: `${baseURL}/step1`,
    method: 'post',
    headers: header,
    data: payload
  };
  return axios(config)
}