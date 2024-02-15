const axios = require('axios');
const qs = require('querystring');
const BASE_URL = 'https://notify-bot.line.me';
const PATH = '/oauth/authorize';

const config = {
  baseURL: BASE_URL,
  url: PATH,
  method: 'get',
  headers: {},
  params: qs.stringify({
    response_type: `code`,
    client_id: `nKWQreA8WGs5wyBJU76bTa`,
    redirect_uri: `https://example.com/cb.php`, // callback url ログイン後リダイレクトされる画面
    scope: `notify`,
    state: `fdasfadsfasd`
  })
};

(async () => {
  const response = await axios.request(config);
  console.log(response.data)
})();