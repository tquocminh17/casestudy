# Minh Tran - Zek

## Prerequisites
- Docker

## How to run
1. Clone the repository
2. Run the following command in the root directory of the repository
```bash
make up # Provision the containers
```
3. To see other available commands, run
```bash
make help
```
---
## Available Endpoints:

### 1. Issue token
Default credentials:
- email: `admin@test.com`
- password: `password`
 
```shell
curl --location --request POST 'http://localhost/api/auth/issue-access-token?email=admin%40test.com&password=password' \
--header 'Content-Type: application/json' \
--header 'Accept: application/json'
```

### 2. Revoke token
```shell
curl --location --request DELETE 'http://localhost/api/auth/revoke-access-token' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer <YOUR-TOKEN>'
```

### 3. List temperatures

```shell
curl --location --globoff 'http://localhost/api/temperatures?filter[device_id]=temperature_sensor&filter[recorded_at_gte]=2022-01-08T11%3A13%3A43Z&filter[recorded_at_lte]=2026-01-01T05%3A00%3A00Z&filter[value_gte]=1&sort[]=-recorded_at' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer <YOUR-TOKEN>'
```

### 4. Create a temperature

```shell
curl --location 'http://localhost/api/temperatures' \
--header 'Content-Type: application/json' \
--header 'Accept: application/json' \
--header 'Authorization: Bearer <YOUR-TOKEN>' \
--form 'value="1.3"' \
--form 'recorded_at="2025-01-08T11:13:43Z"' \
--form 'device_id="temperature_sensor"'
```
