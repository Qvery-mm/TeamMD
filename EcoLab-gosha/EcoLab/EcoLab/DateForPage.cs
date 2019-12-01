using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Xamarin.Forms;

namespace EcoLab
{
    public partial class MainPage : ContentPage
    {
        private List<Client> ListOfClient = new List<Client>
        {
            new Client
            {
                Login = "abc",
                Password = "123"
            }
        };

        private List<Problems> ListOfProblems = new List<Problems>
        {
            new Problems
            {
                Name = "Иван",
                Text = "отвлаоиповипавиолпиавлоиплавплоиавлпаолвиопппппппппппппппппппппппппппп",
                Picture = "problem",
                CountOfSee = 10,
                Title = "Загрязнение берега",
                Date = DateTime.Now,
                Comments = new List<Comment>
                {
                    new Comment
                    {
                        Name = "abc",
                        Text = "Привет"
                    },
                    new Comment
                    {
                        Name = "ab",
                        Text = "Ужас"
                    },
                    new Comment
                    {
                        Name = "abc",
                        Text = "Согласен"
                    },
                    new Comment
                    {
                        Name = "abc",
                        Text = "Это отвратительно"
                    }
                }
            },
            new Problems
            {
                Name = "Мария",
                Text = "отвлаоиповипавиолпиавлоиплавплоиавлпаолвиопппппппппппппппппппппппппппп",
                Picture = "problem",
                CountOfSee = 1,
                Date = DateTime.Now,
                Title = "Загрязнение озера"
            }
        };

        private List<Event> ListOfEvent = new List<Event>
        {
            new Event
            {
                Picture = "Event1.jpj",
                Place = "Комарово",
                Date = "03.03.2020",
                CountOfPeop = 30,
                Title = "Очистка воды и прибрежной зоны от муссора",
                Desrib = "Задесь будет название статьи, а также в некоторых случаях ее первые предложения, предложка статей зависит от региона в котором проживаете",
                Org = new Client{Login = "ClearKomarovo" }
            },

            new Event
            {
                Picture = "Event1.jpj",
                Place = "Лесопарк Сосновка",
                Date = "10.04.2020",
                CountOfPeop = 3,
                Title = "Уборка лесопарка",
                Desrib = "Задесь будет название статьи, а также в некоторых случаях ее первые предложения, предложка статей зависит от региона в котором проживаете",
                Org =new Client{Login ="Правительтство СПБ" }
            },

            new Event
            {
                Picture = "Event1.jpj",
                Place = "Парк им.Бабушкина",
                Date = "02.01.2020",
                CountOfPeop = 3,
                Title = "Оборка парка после Нового года",
                Desrib = "Задесь будет название статьи, а также в некоторых случаях ее первые предложения, предложка статей зависит от региона в котором проживаете",
                Org = new Client{Login ="Зайцев Георгий" }
            },
        };
    }
}
