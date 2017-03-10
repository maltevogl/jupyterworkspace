---------------------------------
Setting up a JupyterHub workspace 
---------------------------------

This repository tries to give guidelines for setting up a JupyterHub environment, where data-sharing is enabled by a NextCloud-backend and users are authentified with CoreOS’s dex OpenIDConnect Client.

To deploy the system, three different docker-compose yaml files are needed. The OIDC provider should be hosted on a different (virtual-)machine then Nextcloud and Jupyterhub.

To use the provided files, the files have to be adapted at several places. Grep for:

    WHITELISTED_USERS #Users are formated username_conntector\nusername2_connector2\n etc
    DEX_BASE_URL # e.g. 127.0.0.1:5554/dex or domain name plus /dex
    DEX_BASE_URL_AS_CN # e.g. 127.0.0.1 or domain name
    DEX_POSTGRES_PASSWORD
    
    JUPYTERHUB_BASE_URL 
    JUPYTERHUB_OAUTH_SECRET
    JUPYTERHUB_ADMIN_PWD
    JUPYTERHUB_CHECKPOINTS_PWD
    JUPYTERHUB_STATE_PWD

    NEXTCLOUD_BASE_URL
    NEXTCLOUD_OAUTH_SECRET
    NEXTCLOUD_ADMIN
    NEXTCLOUD_ADMIN_PWD
    NEXTCLOUD_MYSQL_PWD

    MITRE_BASE_URL
    DEX_CLIENT_ID_MITRE
    DEX_CLIENT_SECRET_MITRE

    DEX_CLIENT_ID_GITHUB
    DEX_CLIENT_SECRET_GITHUB

Step1:
------

Clone the repository and its submodules:
 
git clone git://github.com/foo/bar.git
cd bar
git submodule update --init --recursive

The structure should be

    -->jupyWorkspace
        --> forks/jupyterhub
        --> jupyterhub
        --> nextcloud
        --> dexoidc

Step2: 
------

After editing the above mentioned settings, deploy first dexoidc, then nextcloud, then JupyterHub.

Users are requiered to login first via JupyterHub, as this initiates the user creation and mounts the webdav. After this process the NextCloud frontend can be used with the Dex Oauth Login. 
User passwords are set with a uuid, such that login is only possible via the Dex flow. Only the admin user for JupyterHub and Nextcloud have conventional passwords.
