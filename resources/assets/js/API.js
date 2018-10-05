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

const baseURL = '/api'

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
  data.append('student_card_photo', payload.student_card_photo)

  const config = {
    url: `${baseURL}/step2`,
    method: 'post',
    data: data
  };
  return axios(config)
}

export const login = (payload) => {
  setInterceptors('json')
  const config = {
    url: `${baseURL}/login`,
    method: 'post',
    data: payload
  }
  return axios(config)
}

export const loginAdmin = (payload) => {
    setInterceptors('json')
    const config = {
      url: `${baseURL}/admin`,
      method: 'post',
      data: payload
    }
    return axios(config)
}

export const checkGroupName = (payload) => {
    setInterceptors('json')
    const config = {
      url: `${baseURL}/check-group-name`,
      method: 'post',
      data: payload
    }
    return axios(config)
  }

export const getDataRegisterStep1 = (params) => {
  setInterceptors('json')
  const config = {
    url: `${baseURL}/step1?user_id=${params}`,
    method: 'get'
  }
  return axios(config)
}

export const getDataRegisterStep2 = (params) => {
  setInterceptors('json')
  const config = {
    url: `${baseURL}/step2?user_id=${params}`,
    method: 'get'
  }
  return axios(config)
}

export const getRequestPayment = (payload) => {
  setInterceptors('json')
  const config = {
    url: `${baseURL}/request-payment`,
    method: 'post',
    data: payload
  }
  return axios(config)
}

export const downloadDonations = () => {
    setInterceptors('json')
    const config = {
      url: `${baseURL}/download-donations`,
      method: 'get',
      responseType: 'blob'
    }
    return axios(config)
}

export const downloadVolunteers = () => {
    setInterceptors('json')
    const config = {
      url: `${baseURL}/download-volunteers`,
      method: 'get',
      responseType: 'blob'
    }
    return axios(config)
}

export const downloadOrderDetails = () => {
    setInterceptors('json')
    const config = {
      url: `${baseURL}/download-order-details`,
      method: 'get',
      responseType: 'blob'
    }
    return axios(config)
}
