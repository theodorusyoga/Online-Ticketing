import moment from 'moment';
import 'moment/locale/id';

/* ----------- example format date: 19 Jan, 3.20 PM ----------- */
export const dateNow = () => moment();

/* ----------- example format date: 19 Jan, 3.20 PM ----------- */
export const dateInWordsWithTime = date => moment(date).format('DD MMMM YYYY, HH:mm');

/* ----------- expired date 24 hours from now ----------- */
export const expiredDate = date => moment(date).add(24, 'hours').format('DD MMMM YYYY, HH:mm');


/* -- Indonesian Rupiah Style -- */
export const IDRFormatter = number =>
  new Intl.NumberFormat('id-ID', { currency: 'IDR', minimumFractionDigits: 0 })
    .format(number)
