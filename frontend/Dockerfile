# FROM node:alpine

# WORKDIR /usr/app

# copy package.json
# COPY ./package.json .

# RUN npm install

# copy code from frontend to /usr/app
# COPY . .

# start npm
# CMD ["npm", "start"]


# build
FROM node:alpine as builder
WORKDIR /usr/app
COPY ./package.json .
RUN npm install
COPY . .
RUN npm run build
CMD ["npm", "start"]

FROM nginx
EXPOSE 80
COPY --from=builder /usr/app/build /usr/share/nginx/html