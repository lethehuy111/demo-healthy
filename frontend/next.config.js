const nextConfig = {
  reactStrictMode: true,
  env: {
    API_URL: process.env.API_URL,
    API_PROTOCOL: process.env.API_PROTOCOL,
    API_HOSTNAME: process.env.API_HOSTNAME,
    API_POST: process.env.API_POST,
  },
  images: {
    remotePatterns: [
      {
        protocol: process.env.API_PROTOCOL,
        hostname: process.env.API_HOSTNAME,
        port: process.env.API_POST
      },
    ],
  },
}

module.exports = nextConfig
