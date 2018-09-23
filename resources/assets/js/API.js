import axios from 'axios'
import Cookie from 'js-cookie'

const setInterceptors = (type) => {
    axios.interceptors.request.use(config => {
        const token = Cookie.get('token')
        if(type === 'json'){
            config.headers = {
                'Content-type': 'application/json',
                'Authorization': token
            }
        } else {
            config.headers = {
                'Content-type': 'application/x-www-form-urlencoded',
                'Authorization': token
            }
        }
        return config
    })
}

const baseURL = 'http://localhost:8000/api'

export const postData = (payload) => {
    setInterceptors('json')
  const config = {
    url: `${baseURL}/step1`,
    method: 'post',
    data: payload
  };
  return axios(config)
}

export const postDataStep2 = (payload) => {
  // console.log('--->', payload.user_id)
  setInterceptors('form')
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
    data: data
  };
  return axios(config)
}
