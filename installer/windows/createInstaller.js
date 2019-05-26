const createWindowsInstaller = require('electron-winstaller').createWindowsInstaller
const path = require('path')

getInstallerConfig()
  .then(createWindowsInstaller)
  .catch((error) => {
    console.error(error.message || error)
    process.exit(1)
  })

function getInstallerConfig () {
  console.log('creating windows installer')
  const rootPath = path.join('./')
  const outPath = path.join(rootPath, 'release-builds')

  return Promise.resolve({
    appDirectory: path.join(outPath, 'Siba-desktop-app-win32-ia32/'),
    authors: 'Ryandi Widjaja',
    noMsi: true,
    outputDirectory: path.join(outPath, 'windows-installer'),
    exe: 'siba-desktop.exe',
    setupExe: 'SibaDesktopInstaller.exe',
    setupIcon: './public/AA_Logo.ico'
    // setupIcon: path.join(rootPath, 'public', 'AA_Logo.ico')
  })
}