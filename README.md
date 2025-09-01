# AWS 3-Tier Architecture
### Deploy a 3-tier architecture on AWS: Frontend (Nuxt.js), Backend (Laravel), and Database (MySQL).

## Architecture Overview
<img src="screenshots/architecture.png" alt="architecture" />

## Frontend View (Author List, Create, Edit, Delete)
<img src="screenshots/author-list.png" width="600" alt="author-list" />
<img src="screenshots/author-create.png" width="600" alt="author-create" />
<img src="screenshots/author-edit.png" width="600" alt="author-edit" />
<img src="screenshots/author-delete.png" width="600" alt="author-delete" />

## VPC & Subnet
- vpc-cidr-block: 10.0.0.0/16 
#### Subnets
- public(frontend)-subnet-1-cidr-block: 10.0.1.0/24
- public(frontend)-subnet-2-cidr-block: 10.0.2.0/24
- private(backend)-subnet-1-cidr-block: 10.0.3.0/24
- private(backend)-subnet-2-cidr-block: 10.0.4.0/24
- private(db)-subnet-1-cidr-block: 10.0.5.0/24
- private(db)-subnet-2-cidr-block: 10.0.6.0/24

<img src="screenshots/vpc.png" width="600" alt="vpc" />
<img src="screenshots/subnets.png" width="600" alt="subnets" />

## Internet Gateway & NAT Gateway
<img src="screenshots/igw.png" width="600" alt="igw" />
<img src="screenshots/nat-gw.png" width="600" alt="nat-gw" />

## Frontend Dependency
- Nginx
- git
- nodejs & npm

## Backend Dependency
- Apache
- git
- nodejs & npm (not mandatory)
- php
- mysql
- composer