import axios from 'axios'
import Cookie from 'js-cookie'

const baseURL = 'http://localhost:8000/api'

export const postData = (payload) => {
  const token = Cookie.get('token')
  const config = {
    method: 'POST',
    headers: { 
      'content-type': 'application/json',
      'Authorization': token
    },
    data: payload,
    url: `${baseURL}/step1`
  };
  return axios(config)
}