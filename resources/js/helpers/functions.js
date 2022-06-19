export const transformDate = (date) => {
  let newDate = new Date(date)
  return newDate.toLocaleString('pt-BR', {
    timezone: 'UTC'
  })
}

const imageTypes = ['jpg', 'png', 'webp', 'jpeg']
const videoTypes = ['mp4', 'avi', 'mov']

export const checkFileFormat = (file) => {
  let extension = file.substring(file.lastIndexOf(".")).replace('.', '');
  if (imageTypes.find(type => type === extension)) return 'image'
  if (videoTypes.find(type => type === extension)) return 'video'

}