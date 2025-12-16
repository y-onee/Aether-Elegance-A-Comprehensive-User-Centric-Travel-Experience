# GitHub Actions Deployment Setup Guide

This guide will help you set up automatic deployment to InfinityFree whenever you push changes to GitHub.

## Prerequisites

- ✅ GitHub repository created
- ✅ Code pushed to GitHub
- ✅ InfinityFree FTP credentials

## Step 1: Get Your InfinityFree FTP Credentials

1. Log into your **InfinityFree Control Panel**
2. Go to **"FTP Accounts"** or **"File Manager"**
3. Note down:
   - **FTP Host:** Usually `ftpupload.net` or similar (check your control panel)
   - **FTP Username:** Your FTP username
   - **FTP Password:** Your FTP password
   - **Remote Path:** Usually `/htdocs/` or `/public_html/` (check in File Manager)

## Step 2: Set Up GitHub Secrets

1. Go to your **GitHub repository** on GitHub.com
2. Click on **"Settings"** (top menu)
3. In the left sidebar, click **"Secrets and variables"** → **"Actions"**
4. Click **"New repository secret"** for each of these:

### Secret 1: FTP_HOST

- **Name:** `FTP_HOST`
- **Value:** Your FTP host (e.g., `ftpupload.net` or `ftp.yoursite.com`)
- Click **"Add secret"**

### Secret 2: FTP_USERNAME

- **Name:** `FTP_USERNAME`
- **Value:** Your FTP username
- Click **"Add secret"**

### Secret 3: FTP_PASSWORD

- **Name:** `FTP_PASSWORD`
- **Value:** Your FTP password
- Click **"Add secret"**

### Secret 4: FTP_REMOTE_PATH

- **Name:** `FTP_REMOTE_PATH`
- **Value:** Your remote directory (usually `/htdocs/` or `/public_html/`)
- Click **"Add secret"**

## Step 3: Ensure config.php is on Server

**IMPORTANT:** The workflow will NOT deploy `config.php` (it's in .gitignore for security).

You need to manually upload `config.php` to InfinityFree ONCE:

1. Upload `config.php` via File Manager or FTP
2. Make sure it has the correct database credentials
3. After that, it won't be overwritten by deployments

## Step 4: Push Your Code

1. Make sure your code is committed and pushed to GitHub:

   ```bash
   git add .
   git commit -m "Add GitHub Actions deployment"
   git push origin main
   ```

   (Replace `main` with `master` if that's your default branch)

2. The workflow will automatically trigger on push

## Step 5: Monitor Deployment

1. Go to your GitHub repository
2. Click on the **"Actions"** tab
3. You'll see the deployment workflow running
4. Click on it to see real-time logs
5. Green checkmark ✅ means success, red X ❌ means failure

## How It Works

- **Automatic:** Every time you push to `main` or `master` branch, files are automatically deployed
- **Manual:** You can also trigger it manually from the Actions tab
- **Selective:** Only deploys necessary files (excludes documentation, test files, etc.)
- **Safe:** `config.php` is protected and won't be overwritten

## Files That Are Deployed

✅ All `.php` files (except config.php)  
✅ All `.html` files  
✅ All `.css` files  
✅ All `.js` files  
✅ `Media/` folder with all images

## Files That Are NOT Deployed

❌ `config.php` (protected - must upload manually)  
❌ Documentation files (`.md` files)  
❌ Test files (`test_connection.php`, `run_test.html`)  
❌ Git files (`.git`, `.gitignore`)  
❌ GitHub workflows (`.github/`)

## Troubleshooting

### Deployment fails with "Connection refused"

- Check your FTP_HOST secret value
- Verify FTP credentials are correct
- Make sure FTP is enabled on your InfinityFree account

### Files not appearing on website

- Check FTP_REMOTE_PATH is correct (usually `/htdocs/` or `/public_html/`)
- Verify the deployment completed successfully (green checkmark)
- Clear your browser cache

### config.php gets overwritten

- Don't worry, it's in .gitignore so it won't be deployed
- If you need to update config.php, upload it manually via File Manager

### Need to exclude more files?

Edit `.github/workflows/deploy.yml` and add to the `exclude:` section.

## Testing the Deployment

1. Make a small change to any PHP/HTML/CSS file
2. Commit and push:
   ```bash
   git add .
   git commit -m "Test deployment"
   git push
   ```
3. Wait 1-2 minutes
4. Visit your website to see the changes

## Manual Deployment

If you need to deploy manually without pushing:

1. Go to GitHub repository → **"Actions"** tab
2. Click on **"Deploy to InfinityFree"** workflow
3. Click **"Run workflow"** button (top right)
4. Select your branch
5. Click **"Run workflow"**

---

🎉 You're all set! Every push will automatically deploy to InfinityFree!
